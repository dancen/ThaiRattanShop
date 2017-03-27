<?php

namespace App\Models\Memento;

use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

// this class manage sharing data by using the driver in config/cache.php

class Memento extends AppMemento implements MementoInterface {
    
    
    /*
      |--------------------------------------------------------------------------
      | GET DATA FROM CACHE
      |--------------------------------------------------------------------------
      |
      |
     */

    /**
     * get() 
     *
     * @param  String $key
     * @return null
     */
    
    public function get($key) {
        return Cache::get($key);
    }

     /*
      |--------------------------------------------------------------------------
      | STORE DATA TO CACHE
      |--------------------------------------------------------------------------
      |
      |
     */

    /**
     * set() 
     *
     * @param  String $key
     * @param  mixed $value
     * @return null
     */
    
    public function set($key, $value) {
        $expiresAt = Carbon::now()->addMinutes(self::EXPIRY_TIME_MIN);
        Cache::put($key, $value, $expiresAt);
    }

     /*
      |--------------------------------------------------------------------------
      | DELETE DATA FROM CACHE
      |--------------------------------------------------------------------------
      |
      |
     */

    /**
     * delete() 
     *
     * @param  String $key
     * @return null
     */
    
    public function delete($key) {
        Cache::forget($key);
    }

    /*
      |--------------------------------------------------------------------------
      | CLEAR ALL DATA FROM CACHE
      |--------------------------------------------------------------------------
      |
      |
     */

    /**
     * clear() 
     *
     * @param  null
     * @return null
     */
    
    public function clear() {
        Cache::flush();
    }

}
