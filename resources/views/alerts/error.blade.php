@if (session($key ?? 'error'))
    <div class="toast alert-error" role="alert" data-autohide="true">
    	<div class="toast-header">
		    <strong class="mr-auto text-error">Error</strong>
		    <small class="text-muted">a few seconds ago</small>
		    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
	    </div>
	    <div class="toast-body">
	      {!! session($key ?? 'error') !!}
	    </div>
    </div>
@endif
