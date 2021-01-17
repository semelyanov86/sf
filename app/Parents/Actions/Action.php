<?php


namespace Parents\Actions;


abstract class Action
{
    /**
     * Set automatically by the controller after calling an Action.
     * Allows the Action to know which UI invoke it, to modify it's behaviour based on it, when needed.
     *
     * @var string
     */
    protected string $ui;

    public function __construct($ui = 'Web')
    {
        $this->ui = $ui;
    }

    /**
     * @param $interface
     *
     * @return  $this
     */
    public function setUI(string $interface): static
    {
        $this->ui = $interface;

        return $this;
    }

    /**
     * @return  ?string
     */
    public function getUI(): ?string
    {
        return $this->ui;
    }
}
