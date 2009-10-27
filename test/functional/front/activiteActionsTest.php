<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfGuardTestFunctional(new sfBrowser('docbook'));

$userId = sfContext::getInstance()->getUser()->getUserId();

// Inputs
$empty    = array();
$correct  = array('libelle' => "C'est une première activité");


$browser->

info('List the activities')->
get('/activite/index')->
with('request')->begin()->
    isParameter('module', 'activite')->
    isParameter('action', 'index')->
end()->
with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
end()->



info('Add a new empty activity')->
get('activite/new')->
with('response')->begin()->
    click('Sauvegarder', array('activite' => $empty))->
end()->
with('form')->begin()->
    hasErrors(true)->
end()->
with('response')->begin()->
    checkElement('body', '/Requis/')->
end()->



info('Add a correct activity for ' . $userId)->
with('response')->begin()->
    click('Sauvegarder', array('activite' => $correct))->
end()->
followRedirect()->
with('request')->begin()->
    isParameter('module', 'activite')->
    isParameter('action', 'index')->
end()
;
