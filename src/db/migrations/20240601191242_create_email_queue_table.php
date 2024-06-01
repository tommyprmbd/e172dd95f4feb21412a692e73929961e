<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Util\Literal;

final class CreateEmailQueueTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table("email_queue");
        $table
            ->addColumn("email","string", ["limit"=> 100, "null"=> false])
            ->addColumn("subject","string", ["limit"=> 255, "null"=> false])
            ->addColumn("message","text", ["null"=> false])
            ->addColumn("processed_at","datetime",["null"=>true])
            ->addColumn("status","string", ["null"=> false])
            ->addColumn("additional_info","text",["null"=>true])
            ->addColumn("created_by","integer",["null"=>true])
            ->addForeignKey("created_by", "users", "id", ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
            ->addColumn('created_at', 'timestamp', [
                'timezone' => true,
                'default' => Literal::from('now()')
            ])
            ->addColumn("updated_by","integer",["null"=>true])
            ->addForeignKey("updated_by", "users", "id", ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
            ->addColumn('updated_at', 'timestamp', [
                'timezone' => true,
            ])
            ->create();
    }
}
