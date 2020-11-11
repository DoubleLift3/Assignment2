<?php
namespace Quwi\framework;

interface Observer{
    public function update(Observable_Model $obs);

}