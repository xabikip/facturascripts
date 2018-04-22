<?php
/**
 * This file is part of FacturaScripts
 * Copyright (C) 2018  Francesc Pineda Segarra <francesc.pineda.segarra@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace FacturaScripts\Test\Core\Model;

use FacturaScripts\Core\Base\DataBase;
use FacturaScripts\Core\Model\PresupuestoCliente;
use PHPUnit\Framework\TestCase;

/**
 * @covers \PresupuestoCliente
 *
 * @author Francesc Pineda Segarra <francesc.pineda.segarra@gmail.com>
 */
final class PresupuestoClienteTest extends TestCase
{
    public function testNewPresupuestoCliente()
    {
        $model = new PresupuestoCliente();

        $this->assertInstanceOf(PresupuestoCliente::class, $model);
        $this->assertEquals('', $model->nombrecliente);
        $this->assertTrue($model->test());

        $model->nombrecliente = 'Test name';

        $this->assertTrue($model->test());
    }

    public function testTable()
    {
        $model = new PresupuestoCliente();

        $this->assertInternalType('string', $model::tableName());
    }

    public function testPrimaryColumn()
    {
        $model = new PresupuestoCliente();

        $this->assertInternalType('string', $model::primaryColumn());
    }

    public function testInstall()
    {
        $model = new PresupuestoCliente();

        $this->assertInternalType('string', $model->install());
    }

    public function testSave()
    {
        $dataBase = new DataBase();

        $this->assertEquals(true, $dataBase->connect());

        $model = new PresupuestoCliente();
        $sql = $model->install();

        if ($sql !== '') {
            $result = $dataBase->exec($sql);
            $this->assertFalse($result);
        }
    }

    public function testAll()
    {
        $model = new PresupuestoCliente();
        $list = $model->all();

        if (!empty($list)) {
            $this->assertInternalType('array', $list);
        } else {
            $this->assertSame([], $list);
        }
    }
}
