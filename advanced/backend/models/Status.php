<?php
 namespace backend\models;

 use yii\db\ActiveRecord;

 class Status extends ActiveRecord {
     public static function tableName()
     {
         return '{{%status}}';
     }
 }