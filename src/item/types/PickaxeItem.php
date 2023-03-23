<?php

namespace customiesdevs\customies\item\types;

use customiesdevs\customies\item\component\DurabilityComponent;
use customiesdevs\customies\item\component\HandEquippedComponent;
use customiesdevs\customies\item\component\RenderOffsetsComponent;
use customiesdevs\customies\item\CreativeInventoryInfo;
use customiesdevs\customies\item\ItemComponents;
use customiesdevs\customies\item\ItemComponentsTrait;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\Pickaxe;
use pocketmine\item\ToolTier;

class PickaxeItem extends Pickaxe implements ItemComponents
{
    use ItemComponentsTrait;

    private int $durability;
    private float $efficiency;
    private int $attack;

    public function __construct(ItemIdentifier $identifier, string $name, int $durability, float $efficiency, string $textureName, int $attack, int $renderOffset, ToolTier $tier)
    {
        parent::__construct($identifier, $name, $tier);



        $inventory = new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_EQUIPMENT, CreativeInventoryInfo::GROUP_PICKAXE);
        $this->initComponent($textureName, $inventory);
        $this->addComponent(new DurabilityComponent($durability));
        $this->addComponent(new HandEquippedComponent());
        $this->addComponent(new RenderOffsetsComponent($renderOffset, $renderOffset, true));


        $this->durability = $durability;
        $this->efficiency = $efficiency;
        $this->attack = $attack;
    }

    public function getMaxDurability(): int
    {
        return $this->durability;
    }

    public function getBaseMiningEfficiency(): float
    {
        return $this->efficiency;
    }

    public function getAttackPoints(): int
    {
        return $this->attack;
    }
}