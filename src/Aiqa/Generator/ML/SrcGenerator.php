<?php
/**
 * Created by PhpStorm.
 * User: pawelchmielewski
 * Date: 2019-05-13
 * Time: 10:15.
 */

namespace Aiqa\Generator\ML;

use Aiqa\Generator\RandomDataGeneratorInterface;

class SrcGenerator implements RandomDataGeneratorInterface
{
    /**
     * This method returns random src csv string.
     *
     * @return string
     *
     * @throws \Exception
     */
    public function getRandom()
    {
        $columns = rand(1, 1000);
        $rows = rand(1, 1000);

        if ($rows > $columns) {
            $rows = rand(1, $columns);
        }

        return $this->getCsvString($rows, $columns);
    }

    /**
     * This method returns csv string from given $rows and $columns.
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
        if ($rows > $columns) {
            throw new \Exception('Number of rows must be less or equal to number of columns');
        }

        $testSrcString = '';
        for ($row = 0; $row < $rows; $row++) {
            for ($column = 0; $column < $columns; $column++) {
                if ($column == $row) {
                    $testSrcString .= $column !== $columns - 1 ? '1,' : '1';
                } else {
                    $testSrcString .= $column !== $columns - 1 ? '0,' : '0';
                }
            }
            $testSrcString .= PHP_EOL;
        }

        return $testSrcString;
    }
}
