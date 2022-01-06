## <h1>  aplicación web que permite administrar la información de sus usuarios, y realizar el envío de emails </h1>



<img src="https://user-images.githubusercontent.com/37219277/146828188-b808db39-7637-4fcd-8029-99b8f8d8d640.png" style="max-width: 100%;">

<img src="https://user-images.githubusercontent.com/37219277/148391786-3b9b3904-0a1f-479e-a181-b6e043859826.png" style="max-width: 100%;">

<img src="https://user-images.githubusercontent.com/37219277/148392124-e29cd42c-ea29-46b7-85e9-ba370a2bfab7.png" style="max-width: 100%;">

<img src="https://user-images.githubusercontent.com/37219277/148392734-92cda92d-a9d3-40b5-ae2c-20992ab1ff11.png" style="max-width: 100%;">



<img src="https://user-images.githubusercontent.com/37219277/148393279-f4c56126-f528-41a7-8dd6-f00a500b9905.png" style="max-width: 100%;">



<img src="https://user-images.githubusercontent.com/37219277/148393794-210ee878-9c2b-4013-8fbf-0757b2b6a7f6.png" style="max-width: 100%;">



<img src="https://user-images.githubusercontent.com/37219277/148395494-7d8dd3ae-a2e3-4a88-9b0f-ae2531745a2c.png" style="max-width: 100%;">



## Especificación técnica

* Laravel 8
* Vue 2
* AdminLTE 3 
* Vutify
* Axios
* Sweetalert2
* vue-router


## Caracteristicas

* Seeders con usuario admin, Country, State y City
* Administrador: Puede Crear + Editar + Eliminar basado en modal y con Sweetalert, Lista con paginación, Buscador de usuarios. Ver todos los E-mails de todos los usuarios que se han enviado y los que no se han enviado
* Usuario: Puede enviar email y listar los emails que el ha enviado y los que no se han enviado
.

### Instalación

* git clone https://github.com/tonyfigueras/technical_test.git
* cd technical_test/
* composer install
* npm install
* modificar el archivo .env.example a .env
* Actualice .env y configure las credenciales de su base de datos
* php artisan key:generate
* php artisan migrate:fresh --seed NOTA: PUEDE TARDAR UN POCO EN CARGAR LOS SEEDER DEBIDO A QUE TAMBIEN SE CARGARGAN LOS PAISES CON SUS ESTADOS Y CIUDADES DEL MUNDO
* npm install
* npm run dev
* php artisan serve
* Para programar o enviar los correos ejecutar el siguiente comando artisan: php artisan queue:work
* Credenciales para el envio de emails desde mailtrap
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=d78585ab532587
MAIL_PASSWORD=41176a57d390a2
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=e3b2b1fd08-59cd7b@inbox.mailtrap.io
MAIL_FROM_NAME="${APP_NAME}"
