<?php


namespace trianstudios\Press;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ReflectionClass;
use trianstudios\Press\Facades\Press;

class PressFileParser
{

    protected string $filename;

    protected $rawData;

    protected array $data;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->splitFile();
        $this->explodeData();
        $this->processFields();
    }

    public function getRawData()
    {
        return $this->rawData;
    }

    public function getData()
    {
        return $this->data;
    }

    protected function splitFile()
    {
        preg_match(
            '/^\-{3}(.*?)\-{3}(.*)/s',
            File::exists($this->filename) ? File::get($this->filename) : $this->filename,
            $this->rawData
        );
    }

    protected function explodeData()
    {

        if (strpos($this->rawData[1], "\r\n") !== false) {
            $explodedData = explode("\r\n", trim($this->rawData[1]));
        } elseif (strpos($this->rawData[1], "\n") !== false) {
            $explodedData = "\n";
        } elseif (strpos($this->rawData[1], "\r") !== false) {
            $explodedData = "\r";
        }else{
            $explodedData = $this->rawData[1];
        }

        foreach ($explodedData as $fieldString) {
            preg_match('/(.*):\s?(.*)/', $fieldString, $fieldArray);
            $this->data[$fieldArray[1]] = $fieldArray[2];
        }

        $this->data['body'] = trim($this->rawData[2]);
    }

    protected function processFields()
    {
        foreach ($this->data as $field => $value) {
            $class = $this->getFields(Str::title($field));

            if (!class_exists($class) && !method_exists($class, 'process')) {
                $class = 'trianstudios\\Press\\Fields\\Extra';
            }

            $this->data = array_merge(
                $this->data,
                $class::process($field, $value, $this->data)
            );
        }
    }

    /**
     * @param $field
     * @return string
     * @throws \ReflectionException
     */
    private function getFields($field)
    {
        foreach (Press::availableFields() as $availableField) {
            $class = new ReflectionClass($availableField);

            if ($class->getShortName() === $field) {
                return $class->getName();
            }
        }
    }

}