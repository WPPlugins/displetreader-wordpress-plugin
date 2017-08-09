<?php
/*
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */


  /**
   * The "currentLocation" collection of methods.
   * Typical usage is:
   *  <code>
   *   $latitudeService = new displetretsidx_Google_LatitudeService(...);
   *   $currentLocation = $latitudeService->currentLocation;
   *  </code>
   */
  class displetretsidx_Google_CurrentLocationServiceResource extends displetretsidx_Google_ServiceResource {


    /**
     * Updates or creates the user's current location. (currentLocation.insert)
     *
     * @param displetretsidx_Google_Location $postBody
     * @param array $optParams Optional parameters.
     * @return displetretsidx_Google_Location
     */
    public function insert(displetretsidx_Google_Location $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new displetretsidx_Google_Location($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns the authenticated user's current location. (currentLocation.get)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param string granularity Granularity of the requested location.
     * @return displetretsidx_Google_Location
     */
    public function get($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new displetretsidx_Google_Location($data);
      } else {
        return $data;
      }
    }
    /**
     * Deletes the authenticated user's current location. (currentLocation.delete)
     *
     * @param array $optParams Optional parameters.
     */
    public function delete($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
  }

  /**
   * The "location" collection of methods.
   * Typical usage is:
   *  <code>
   *   $latitudeService = new displetretsidx_Google_LatitudeService(...);
   *   $location = $latitudeService->location;
   *  </code>
   */
  class displetretsidx_Google_LocationServiceResource extends displetretsidx_Google_ServiceResource {


    /**
     * Inserts or updates a location in the user's location history. (location.insert)
     *
     * @param displetretsidx_Google_Location $postBody
     * @param array $optParams Optional parameters.
     * @return displetretsidx_Google_Location
     */
    public function insert(displetretsidx_Google_Location $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new displetretsidx_Google_Location($data);
      } else {
        return $data;
      }
    }
    /**
     * Reads a location from the user's location history. (location.get)
     *
     * @param string $locationId Timestamp of the location to read (ms since epoch).
     * @param array $optParams Optional parameters.
     *
     * @opt_param string granularity Granularity of the location to return.
     * @return displetretsidx_Google_Location
     */
    public function get($locationId, $optParams = array()) {
      $params = array('locationId' => $locationId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new displetretsidx_Google_Location($data);
      } else {
        return $data;
      }
    }
    /**
     * Lists the user's location history. (location.list)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param string max-results Maximum number of locations to return.
     * @opt_param string max-time Maximum timestamp of locations to return (ms since epoch).
     * @opt_param string min-time Minimum timestamp of locations to return (ms since epoch).
     * @opt_param string granularity Granularity of the requested locations.
     * @return displetretsidx_Google_LocationFeed
     */
    public function listLocation($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new displetretsidx_Google_LocationFeed($data);
      } else {
        return $data;
      }
    }
    /**
     * Deletes a location from the user's location history. (location.delete)
     *
     * @param string $locationId Timestamp of the location to delete (ms since epoch).
     * @param array $optParams Optional parameters.
     */
    public function delete($locationId, $optParams = array()) {
      $params = array('locationId' => $locationId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
  }

/**
 * Service definition for displetretsidx_Google_Latitude (v1).
 *
 * <p>
 * Lets you read and update your current location and work with your location history
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="https://developers.google.com/latitude/v1/using" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class displetretsidx_Google_LatitudeService extends displetretsidx_Google_Service {
  public $currentLocation;
  public $location;
  /**
   * Constructs the internal representation of the Latitude service.
   *
   * @param displetretsidx_Google_Client $client
   */
  public function __construct(displetretsidx_Google_Client $client) {
    $this->servicePath = 'latitude/v1/';
    $this->version = 'v1';
    $this->serviceName = 'latitude';

    $client->addService($this->serviceName, $this->version);
    $this->currentLocation = new displetretsidx_Google_CurrentLocationServiceResource($this, $this->serviceName, 'currentLocation', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/latitude.all.best", "https://www.googleapis.com/auth/latitude.all.city", "https://www.googleapis.com/auth/latitude.current.best", "https://www.googleapis.com/auth/latitude.current.city"], "request": {"$ref": "LatitudeCurrentlocationResourceJson"}, "response": {"$ref": "LatitudeCurrentlocationResourceJson"}, "httpMethod": "POST", "path": "currentLocation", "id": "latitude.currentLocation.insert"}, "get": {"scopes": ["https://www.googleapis.com/auth/latitude.all.best", "https://www.googleapis.com/auth/latitude.all.city", "https://www.googleapis.com/auth/latitude.current.best", "https://www.googleapis.com/auth/latitude.current.city"], "parameters": {"granularity": {"default": "city", "enum": ["best", "city"], "type": "string", "location": "query"}}, "response": {"$ref": "LatitudeCurrentlocationResourceJson"}, "httpMethod": "GET", "path": "currentLocation", "id": "latitude.currentLocation.get"}, "delete": {"path": "currentLocation", "scopes": ["https://www.googleapis.com/auth/latitude.all.best", "https://www.googleapis.com/auth/latitude.all.city", "https://www.googleapis.com/auth/latitude.current.best", "https://www.googleapis.com/auth/latitude.current.city"], "id": "latitude.currentLocation.delete", "httpMethod": "DELETE"}}}', true));
    $this->location = new displetretsidx_Google_LocationServiceResource($this, $this->serviceName, 'location', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/latitude.all.best", "https://www.googleapis.com/auth/latitude.all.city"], "request": {"$ref": "Location"}, "response": {"$ref": "Location"}, "httpMethod": "POST", "path": "location", "id": "latitude.location.insert"}, "get": {"scopes": ["https://www.googleapis.com/auth/latitude.all.best", "https://www.googleapis.com/auth/latitude.all.city"], "parameters": {"locationId": {"required": true, "type": "string", "location": "path"}, "granularity": {"default": "city", "enum": ["best", "city"], "type": "string", "location": "query"}}, "id": "latitude.location.get", "httpMethod": "GET", "path": "location/{locationId}", "response": {"$ref": "Location"}}, "list": {"scopes": ["https://www.googleapis.com/auth/latitude.all.best", "https://www.googleapis.com/auth/latitude.all.city"], "parameters": {"max-results": {"type": "string", "location": "query"}, "max-time": {"type": "string", "location": "query"}, "min-time": {"type": "string", "location": "query"}, "granularity": {"default": "city", "enum": ["best", "city"], "type": "string", "location": "query"}}, "response": {"$ref": "LocationFeed"}, "httpMethod": "GET", "path": "location", "id": "latitude.location.list"}, "delete": {"scopes": ["https://www.googleapis.com/auth/latitude.all.best", "https://www.googleapis.com/auth/latitude.all.city"], "path": "location/{locationId}", "id": "latitude.location.delete", "parameters": {"locationId": {"required": true, "type": "string", "location": "path"}}, "httpMethod": "DELETE"}}}', true));

  }
}

class displetretsidx_Google_Location extends displetretsidx_Google_Model {
  public $kind;
  public $altitude;
  public $longitude;
  public $activityId;
  public $latitude;
  public $altitudeAccuracy;
  public $timestampMs;
  public $speed;
  public $heading;
  public $accuracy;
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setAltitude($altitude) {
    $this->altitude = $altitude;
  }
  public function getAltitude() {
    return $this->altitude;
  }
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }
  public function getLongitude() {
    return $this->longitude;
  }
  public function setActivityId($activityId) {
    $this->activityId = $activityId;
  }
  public function getActivityId() {
    return $this->activityId;
  }
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }
  public function getLatitude() {
    return $this->latitude;
  }
  public function setAltitudeAccuracy($altitudeAccuracy) {
    $this->altitudeAccuracy = $altitudeAccuracy;
  }
  public function getAltitudeAccuracy() {
    return $this->altitudeAccuracy;
  }
  public function setTimestampMs($timestampMs) {
    $this->timestampMs = $timestampMs;
  }
  public function getTimestampMs() {
    return $this->timestampMs;
  }
  public function setSpeed($speed) {
    $this->speed = $speed;
  }
  public function getSpeed() {
    return $this->speed;
  }
  public function setHeading($heading) {
    $this->heading = $heading;
  }
  public function getHeading() {
    return $this->heading;
  }
  public function setAccuracy($accuracy) {
    $this->accuracy = $accuracy;
  }
  public function getAccuracy() {
    return $this->accuracy;
  }
}

class displetretsidx_Google_LocationFeed extends displetretsidx_Google_Model {
  protected $__itemsType = 'displetretsidx_Google_Location';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public function setItems(/* array(displetretsidx_Google_Location) */ $items) {
    $this->assertIsArray($items, 'displetretsidx_Google_Location', __METHOD__);
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
}