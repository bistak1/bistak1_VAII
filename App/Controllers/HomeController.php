<?php

namespace App\Controllers;

use App\Models\Car;
use Exception;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Class HomeController
 * Handles actions related to the home page and vehicle catalog CRUD operations.
 *
 * @package App\Controllers
 */
class HomeController extends BaseController
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
     * Displays the default home page.
     *
     * @param Request $request The incoming request.
     * @return Response The response object containing the rendered HTML.
     */
    public function index(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Displays the catalog page with all cars loaded from the database (Read).
     *
     * @param Request $request The incoming request.
     * @return Response The response object containing the rendered HTML.
     * @throws Exception If the database query fails.
     */
    public function catalog(Request $request): Response
    {
        $cars = Car::getAll(orderBy: 'id DESC');
        return $this->html(compact('cars'));
    }

    /**
     * Displays the form for adding a new car (Create).
     *
     * @param Request $request The incoming request.
     * @return Response The response object containing the form view.
     */
    public function create(Request $request): Response
    {
        $car = new Car();
        return $this->html(compact('car'), 'form');
    }

    /**
     * Displays the form for editing an existing car (Update).
     *
     * @param Request $request The incoming request.
     * @return Response The response object containing the form view or redirect.
     * @throws Exception If the database query fails.
     */
    public function edit(Request $request): Response
    {
        $id = (int)$request->value('id');
        $car = Car::getOne($id);

        if ($car === null) {
            return $this->redirect($this->url('home.catalog'));
        }

        return $this->html(compact('car'), 'form');
    }

    /**
     * Processes the submitted form for creating or updating a car.
     *
     * @param Request $request The incoming request.
     * @return Response Redirects to the catalog page with updated records.
     * @throws Exception If saving fails.
     */
    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            return $this->redirect($this->url('home.catalog'));
        }

        $id = (int)$request->value('id');
        $car = ($id > 0 ? Car::getOne($id) : null) ?? new Car();

        $car->setFromRequest($request);
        $car->save();

        return $this->redirect($this->url('home.catalog'));
    }

    /**
     * Deletes a selected car from the database (Delete).
     *
     * @param Request $request The incoming request.
     * @return Response Redirects to the catalog page.
     * @throws Exception If deletion fails.
     */
    public function delete(Request $request): Response
    {
        $id = (int)$request->value('id');
        $car = Car::getOne($id);

        if ($car !== null) {
            $car->delete();
        }

        return $this->redirect($this->url('home.catalog'));
    }
}