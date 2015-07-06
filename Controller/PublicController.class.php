<?php
namespace Home\Controller;

use Think\Controller;

class PublicController extends Controller {
	public function __construct()
    {
        parent::__construct();
        session("env","dev-test");
        // session("env","test-preview");
    }
}