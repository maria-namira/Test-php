<?php

use PHPUnit\Framework\TestCase;

class UserTableWrapperTest extends TestCase
{
    private UserTableWrapper $table;

    protected function setUp(): void
    {
        $this->table = new UserTableWrapper();
    }

    public function testInsertAndGetData(): void
    {
        $this->table->insert(['name' => 'John Doe', 'age' => 30]);
        $this->table->insert(['name' => 'Jane Doe', 'age' => 25]);

        $expectedData = [
            ['name' => 'John Doe', 'age' => 30],
            ['name' => 'Jane Doe', 'age' => 25],
        ];

        $this->assertEquals($expectedData, $this->table->get());
    }


    public function testUpdateData(): void
    {    
        $this->table->insert(['name' => 'John Doe', 'age' => 30]);
        $this->table->update(0, ['name' => 'Johnny Doe', 'age' => 35]);

        $expectedData = [
            ['name' => 'Johnny Doe', 'age' => 35],
        ];

        $this->assertEquals($expectedData, $this->table->get());
    }

    public function testDeleteData(): void
    {
        $this->table->insert(['name' => 'John Doe', 'age' => 30]);
        $this->table->insert(['name' => 'Jane Doe', 'age' => 25]);
        $this->table->delete(0);

        $expectedData = [
            1 => ['name' => 'Jane Doe', 'age' => 25],
        ];

        $this->assertEquals($expectedData, $this->table->get());
    }
}
