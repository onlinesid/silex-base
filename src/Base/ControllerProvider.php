<?php
/**
 * Created by PhpStorm.
 * User: sid
 * Date: 25/04/15
 * Time: 1:30 PM
 */

namespace OnlineSid\Silex\Base;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class ControllerProvider implements ControllerProviderInterface
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param Application $app
     * @return ControllerCollection
     */
    function connect(Application $app)
    {
        $this->app = $app;
        $this->request = Request::createFromGlobals();

        $controllers = $app['controllers_factory']; /* @var $controllers ControllerCollection */

        $this->setup($controllers);

        return $controllers;
    }

    abstract public function setup(ControllerCollection $controllers);
}