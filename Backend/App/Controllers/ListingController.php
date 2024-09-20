<?php

namespace App\Controllers;

use App\Models\ListingModel;
use Framework\ErrorHandler;

class ListingController {
  protected $listingModel;

  public function __construct() {
    $this->listingModel = new ListingModel();
  }

  public function listings() {
    try {
      $listings = $this->listingModel->getListings();

      // Set content type
      header('Content-Type: application/json');

      // Escape and encode to prevent XSS attacks
      $response = json_encode($listings, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_HEX_APOS);
      echo $response;
    } catch (\Exception $e) {
      error_log($e->getMessage());
      ErrorHandler::error('Failed to retrieve listings', 500);
    }
  }

  public function listing(array $params) {
    $id = $params['id'] ?? null;

    if (!$id || !filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])) {
      ErrorHandler::error('Invalid or missing ID value', 400);
      return;
    }

    try {
      $listing = $this->listingModel->getListing($id);
      if (!$listing) {
        ErrorHandler::error('Listing not found', 404);
        return;
      }

      header('Content-Type: application/json');
      echo json_encode($listing, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_HEX_APOS);
    } catch (\Exception $e) {
      error_log($e->getMessage());
      ErrorHandler::error('Failed to retrieve listing', 500);
    }
  }
}
