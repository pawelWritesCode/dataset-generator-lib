<?php
/**
 * Created by PhpStorm.
 * User: pawelchmielewski
 * Date: 2019-05-13
 * Time: 10:15.
 */

namespace Aiqa\Generator\ML;

use Aiqa\Generator\RandomDataGeneratorInterface;

class TestsGenerator implements RandomDataGeneratorInterface
{
    /**
     * This method returns random tests csv string.
     *
     * @return string
     *
     * @throws \Exception
     */
    public function getRandom()
    {
        $columns = rand(1, 1000);
        $rows = rand(1, 1000);

        return $this->getCsvString($rows, $columns);
    }

    /**
     * This method returns tests string from given $rows and $columns.
     *
     * @param int $rows
     * @param int $columns
     *
     * @return string
     *
     * @throws \Exception
     */
    public function getFixed(int $rows, int $columns): string
    {
        return $this->getCsvString($rows, $columns);
    }

    /**
     * This method generates csv string from given rows and columns.
     *
     * @param int $rows
     * @param int $columns
     *
     * @return string
     *
     * @throws \Exception
     */
    private function getCsvString(int $rows, int $columns): string
    {
        $testSrcString = '';
        for ($row = 0; $row < $rows; $row++) {
            for ($column = 0; $column < $columns; $column++) {
                if ($rows > $columns) {
                    if ($row % $columns == $column) {
                        $testSrcString .= $column !== $columns - 1 ? '1,' : '1';
                    } else {
                        $testSrcString .= $column !== $columns - 1 ? '0,' : '0';
                    }
                } else {
                    if ($row == $column) {
                        $testSrcString .= $column !== $columns - 1 ? '1,' : '1';
                    } else {
                        $testSrcString .= $column !== $columns - 1 ? '0,' : '0';
                    }
                }
            }
            $testSrcString .= PHP_EOL;
        }

        return $testSrcString;
    }
}
