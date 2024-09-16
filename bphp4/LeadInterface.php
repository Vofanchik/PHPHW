<?php

interface LeadInterface
{
    public function command(): void;
    public function getFaired(worker $worker): void;
}