<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');

class RemitterInfo extends AppModel {
    var $useTable = 'remitter_info';
    var $primaryKey = 'id';
}