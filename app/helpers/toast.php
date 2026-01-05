<?php

function showToast($message, $type = 'success', $title = '') {
    $bgClass = [
      'success' => 'bg-success',
      'error' => 'bg-danger',
      'warning' => 'bg-warning',
      'info' => 'bg-info'
    ];
    $textClass = [
      'success' => 'text-white',
      'error' => 'text-white',
      'warning' => 'text-dark',
      'info' => 'text-white'
    ];
    
    $toastId = 'bs-toast-' . uniqid();
    
    echo <<<HTML
      <div class="toast-container position-fixed bottom-0 right start-0 p-3" style="z-index: 99999">
          <div id="{$toastId}" class="toast align-items-center border-0 {$bgClass[$type]} {$textClass[$type]}" 
              role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                  <div class="toast-body d-flex align-items-center">
                      <strong>{$title}:</strong>
                      <span class="ms-2">{$message}</span>
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" 
                          data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
          </div>
      </div>
      
      <script>
      document.addEventListener('DOMContentLoaded', function() {
          const toastElement = document.getElementById('{$toastId}');
          if (toastElement) {
              const toast = new bootstrap.Toast(toastElement, {
                  delay: 3000,
                  autohide: true
              });
              toast.show();
              
              // إزالة بعد الإخفاء
              toastElement.addEventListener('hidden.bs.toast', function () {
                  this.remove();
              });
          }
      });
      </script>
    HTML;
}