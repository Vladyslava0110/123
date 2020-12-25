<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m201225_124742_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
			'title' => $this->string(),
			'title' => $this->string(),
			'description' => $this->text(),
			'content' => $this->text(),
			'date' => $this->date(),
			'image' => $this->string(),
			'viewed' => $this->integer(),
			'user_id' => $this->integer(),
			'status' => $this->integer(),
			'category_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article');
    }
}
