<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\TipoDocumento;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Vista para registro de usuarios
        Fortify::registerView(function () {
            // enviamos datos adicionales a la vista de registro
            $tipos_documentos = TipoDocumento::all();
            return view('auth.register', [
                'combo_tipo_documentos' => $tipos_documentos
            ]);
        });

        // Vista para inicio de sesión
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // Vista para Solicitar enlace para resetear contraseña
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });

        // Vista para indicar la contraseña nueva, se mostrará cuando de clic en 
        // el enlace que se envíe al usuario
        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });

        // Vista para mostrar cuando el usuario que ha iniciado sesión aún no ha verificado
        // su correo electrónico
        Fortify::verifyEmailView(function () {
            return view('auth.email.verify-email');
        });

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
    }
}
