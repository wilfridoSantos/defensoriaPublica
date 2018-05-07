<?php
function testSavingUser()
{
    $user = new User();
    $user->setName('Miles');
    $user->setSurname('Davis');
    $user->save();
    $this->assertEquals('Miles Davis', $user->getFullName());
   // $this->tester->seeInDatabase('users', ['name' => 'Miles', 'surname' => 'Davis']);
}