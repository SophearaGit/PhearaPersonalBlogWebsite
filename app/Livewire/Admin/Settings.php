<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\GeneralSetting;

class Settings extends Component
{

    public $tab = null; // 15.1
    public $defaultTab = 'general_settings'; // 15.2
    protected $queryString = ['tab' => ['keep' => true]]; // 15.3

    // General Settings properties
    public $site_title, $site_email, $site_phone, $site_meta_keywords, $site_meta_description;

    public function selectTab($tab)
    {
        $this->tab = $tab;
    } // 15.4

    public function mount()
    {
        $this->tab = request('tab') ? request('tab') : $this->defaultTab;
        $settings = GeneralSetting::take(1)->first(); // Retrieve the first general settings record
        if (!is_null($settings)) {
            $this->site_title = $settings->site_title;
            $this->site_email = $settings->site_email;
            $this->site_phone = $settings->site_phone;
            $this->site_meta_keywords = $settings->site_meta_keywords;
            $this->site_meta_description = $settings->site_meta_description;
        }
    }

    public function updateSiteInfo()
    {
        $this->validate([
            'site_title' => 'required',
            'site_email' => 'required|email',
            'site_phone' => 'required|numeric',
            'site_meta_keywords' => 'required',
            'site_meta_description' => 'required',
        ]);

        $settings = GeneralSetting::take(1)->first();

        $data = array(
            'site_title' => $this->site_title,
            'site_email' => $this->site_email,
            'site_phone' => $this->site_phone,
            'site_meta_keywords' => $this->site_meta_keywords,
            'site_meta_description' => $this->site_meta_description,
        );

        if (!is_null($settings)) {
            $query = $settings->update($data);
        } else {
            $query = GeneralSetting::insert($data);
        }
        ;

        if ($query) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Site information updated successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Site information updated successfully.']);
        }
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
