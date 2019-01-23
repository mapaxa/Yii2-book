<?php

use yii\db\Migration;

/**
 * Class m190120_145313_change_employee_table_identification_number_type
 */
class m190120_145313_change_employee_table_identification_number_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->alterColumn('employee', 'identification_number', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->alterColumn('employee', 'identification_number', 'integer');
    }

}
