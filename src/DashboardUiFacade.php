<?php

namespace Moman12\DashboardUi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Moman12\DashboardUi\DashboardUi
 */
class DashboardUiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dashboard_ui';
    }
}
