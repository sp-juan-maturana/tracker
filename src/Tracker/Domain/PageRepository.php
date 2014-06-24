<?php

namespace Tracker\Domain;


interface PageRepository {

    public function persist($page);

}