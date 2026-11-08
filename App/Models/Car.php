<?php

namespace App\Models;

use Framework\Core\Model;

/**
 * Class Car
 * Represents a vehicle entity in the car rental catalog.
 *
 * @package App\Models
 */
class Car extends Model
{
    protected static ?string $tableName = 'cars';
    protected static ?string $primaryKey = 'id';

    /** @var string[]|null */
    protected static ?array $fillable = [
        'title',
        'price',
        'mileage',
        'transmission',
        'seats',
        'feature',
        'image',
    ];

    protected ?int $id = null;
    protected string $title = '';
    protected float $price = 0.0;
    protected int $mileage = 0;
    protected string $transmission = 'Automat';
    protected int $seats = 5;
    protected string $feature = '';
    protected string $image = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): void
    {
        $this->mileage = $mileage;
    }

    public function getTransmission(): string
    {
        return $this->transmission;
    }

    public function setTransmission(string $transmission): void
    {
        $this->transmission = $transmission;
    }

    public function getSeats(): int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): void
    {
        $this->seats = $seats;
    }

    public function getFeature(): string
    {
        return $this->feature;
    }

    public function setFeature(string $feature): void
    {
        $this->feature = $feature;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}