<?php

namespace App\Models;

use Exception;
use Framework\Core\Model;

/**
 * Class Reservation
 * Represents a car rental reservation linked to a Car entity (N:1 / 1:N).
 *
 * @package App\Models
 */
class Reservation extends Model
{
    protected static ?string $tableName = 'reservations';
    protected static ?string $primaryKey = 'id';

    /** @var string[]|null */
    protected static ?array $fillable = [
        'car',
        'customer',
        'email',
        'phone',
        'date',
        'days',
        'status',
    ];

    protected ?int $id = null;
    protected int $car = 0;
    protected string $customer = '';
    protected string $email = '';
    protected string $phone = '';
    protected string $date = '';
    protected int $days = 1;
    protected string $status = 'Potvrdená';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getCarId(): int
    {
        return $this->car;
    }

    public function setCarId(int $car): void
    {
        $this->car = $car;
    }

    /**
     * Retrieves the related Car entity via Vaííčko ORM relationship.
     *
     * @return Car|null
     * @throws Exception
     */
    public function getCar(): ?Car
    {
        /** @var Car|null $relatedCar */
        $relatedCar = $this->getOneRelated(Car::class, 'car');
        return $relatedCar;
    }

    public function getCustomer(): string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): void
    {
        $this->customer = $customer;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getDays(): int
    {
        return $this->days;
    }

    public function setDays(int $days): void
    {
        $this->days = $days;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Calculates the total rental price based on the related car's daily price.
     *
     * @return float
     * @throws Exception
     */
    public function getTotalPrice(): float
    {
        $relatedCar = $this->getCar();
        if ($relatedCar === null) {
            return 0.0;
        }
        return $relatedCar->getPrice() * $this->days;
    }
}
