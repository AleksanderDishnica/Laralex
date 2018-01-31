<?php
/**
 * User: Aleksander
 * Date: 1/23/2018
 * Time: 7:35 PM
 */

include "autoloader.php";

	$clients = array('name'=>'Aleksander', 'surname' => 'Dishnica');

    Clients::callClients(3, $clients);

    Form::create('Submit');
    Button::create('Create');

    Footer::View();