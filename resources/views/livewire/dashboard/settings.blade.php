<div class="db-card-header" x-data="{ addModal: false }">
    <div class="container">
        <div class="header-title font-black">
            Settings
        </div>
        <div class="header-subtitle">
            Adjust your preferences.
        </div>
    </div>
</div>
<div class="db-content">
    <div class="container">
        
        <section class="settings-wrapper mb-5">
            <div class="settings-header">
                <h3 class="settings-title font-bold text-xl">
                    Account
                </h3>
            </div>
            <div class="settings-content mt-3">
                <div class="account-card bg-gray-100 rounded flex">
                    <div class="account-photo py-4 pl-4">
                        <img class="h-8 w-8 rounded-full object-cover rounded-full" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
                    </div>
                    <div class="account-info flex-auto ml-3 p-4">
                        <h4 class="font-bold -mb-1 flex-auto leading-8">{{ $user['name'] }}</h4>
                    </div>
                    <div class="account-action flex-none w-auto">
                        <form action="{{ route('logout') }}" method="post">
                            <button class="logout-link hover:no-underline" type="submit">
                                <div class="p-4 block relative h-full hover:text-white font-bold bg-gray-200 hover:bg-red-500">
                                    <span class="leading-8">Logout</span>
                                </div>
                            </button>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="settings-wrapper mb-5">
            <div class="settings-header">
                <h3 class="settings-title font-bold text-xl">
                    Preferences
                </h3>
            </div>
        </section>

    </div>
</div>