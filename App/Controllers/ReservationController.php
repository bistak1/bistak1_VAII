<?php

namespace App\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use Exception;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Class ReservationController
 * Handles CRUD operations for vehicle reservations and their relation to Car.
 *
 * @package App\Controllers
 */
class ReservationController extends BaseController
{
    /**
     * Authorizes controller actions.
     *
     * @param Request $request The incoming request.
     * @param string $action The action name to authorize.
     * @return bool Returns true, allowing all actions.
     */
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    /**
     * Displays the list of all reservations (Read).
     *
     * @param Request $request The incoming request.
     * @return Response The rendered HTML response.
     * @throws Exception If the database query fails.
     */
    public function index(Request $request): Response
    {
        $reservations = Reservation::getAll(orderBy: 'id DESC');
        return $this->html(compact('reservations'));
    }

    /**
     * Displays the form for creating a new reservation (Create).
     *
     * @param Request $request The incoming request.
     * @return Response The rendered form view.
     * @throws Exception If loading cars fails.
     */
    public function create(Request $request): Response
    {
        $cars = Car::getAll(orderBy: 'title ASC');
        $reservation = new Reservation();

        $preselectedCar = (int)$request->value('car');
        if ($preselectedCar > 0) {
            $reservation->setCarId($preselectedCar);
        } elseif (!empty($cars) && $cars[0]->getId() !== null) {
            $reservation->setCarId($cars[0]->getId());
        }

        return $this->html(compact('reservation', 'cars'), 'form');
    }

    /**
     * Displays the form for editing an existing reservation (Update).
     *
     * @param Request $request The incoming request.
     * @return Response The rendered form view or redirect.
     * @throws Exception If the database query fails.
     */
    public function edit(Request $request): Response
    {
        $id = (int)$request->value('id');
        $reservation = Reservation::getOne($id);

        if ($reservation === null) {
            return $this->redirect($this->url('reservation.index'));
        }

        $cars = Car::getAll(orderBy: 'title ASC');
        return $this->html(compact('reservation', 'cars'), 'form');
    }

    /**
     * Saves a new or edited reservation to the database.
     *
     * @param Request $request The incoming request.
     * @return Response Redirects to the reservations list.
     * @throws Exception If saving fails.
     */
    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            return $this->redirect($this->url('reservation.index'));
        }

        $id = (int)$request->value('id');
        $reservation = ($id > 0 ? Reservation::getOne($id) : null) ?? new Reservation();

        $reservation->setFromRequest($request);
        $reservation->save();

        return $this->redirect($this->url('reservation.index'));
    }

    /**
     * Deletes a reservation from the database (Delete).
     *
     * @param Request $request The incoming request.
     * @return Response Redirects to the reservations list.
     * @throws Exception If deletion fails.
     */
    public function delete(Request $request): Response
    {
        $id = (int)$request->value('id');
        $reservation = Reservation::getOne($id);

        if ($reservation !== null) {
            $reservation->delete();
        }

        return $this->redirect($this->url('reservation.index'));
    }
}
