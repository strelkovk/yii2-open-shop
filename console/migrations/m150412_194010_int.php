<?php

use yii\db\Schema;
use yii\db\Migration;

class m150412_194010_int extends Migration
{
    public function up()
    {

        $this->execute('

            CREATE TABLE source_message (
                id INTEGER PRIMARY KEY AUTO_INCREMENT,
                category VARCHAR(32),
                message TEXT
            ) CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB;

        ');

        $this->execute('

            CREATE TABLE message (
                id INTEGER,
                language VARCHAR(16),
                translation TEXT,
            PRIMARY KEY (id, language),
            CONSTRAINT fk_message_source_message FOREIGN KEY (id)
                REFERENCES source_message (id) ON DELETE CASCADE ON UPDATE RESTRICT
            )CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB;

        ');

    }

    public function down()
    {
        $this->dropTable('message');
        $this->dropTable('source_message');
    }
}
