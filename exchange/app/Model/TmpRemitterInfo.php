<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');

class TmpRemitterInfo extends AppModel {
    var $primaryKey = 'id';
}