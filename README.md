<h1>
    Pebble health database display utility
</h1>
<p>This is a Laravel project that helps you visualize your Pebble Health watch's data.</p>
<p>A few things first:</p>
Acquire your Pebble health database using your Pebble watch app
<ol>
    <li>Open the Pebble watch app</li>
    <li>Tap the menu</li>
    <li>Tap "Help"</li>
    <li>Select "Share Diagnostics"</li>
    <li>Select "Pebble Health"</li>
    <li>Hit "OK"</li>
    <li>Choose a location to save the archive. This will be the file you'll upload directly to the Pealth utility</li>
</ol>

Configure the Pealth .ENV file
<ol>
<li>Clone the repository</li>
<li>Create a new ".env" file out of ".env.example"</li>
<li>Modify ".env" and remove
# DB_HOST=127.0.0.1,
DB_PORT=3306,
DB_USERNAME=root,
DB_PASSWORD=,
</li>
<li>Change "DB_CONNECTION=mysql" to "DB_CONNECTION=sqlite"</li>
<li>Change "DB_DATABASE=laravel" to "DB_DATABASE=/[absolute]/[path]/[to]/[repository]/pealth/storage/app/private/decompressed/health.sqlite"</li>
<li>Navigate to the root of the project and run these three commands:
    <ol>
        <li>composer install</li>
        <li>php artisan key:generate</li>
        <li>php artisan migrate</li>
        make sure not to create a database when asked
        <li>php artisan serve</li>
    </ol>
</ol>
Now you may navigate to http://127.0.0.1:8000 to use the utility!
