<?php

abstract class Creator
{
    abstract public function createRaport($category): RaportFactoryInterface;
}
