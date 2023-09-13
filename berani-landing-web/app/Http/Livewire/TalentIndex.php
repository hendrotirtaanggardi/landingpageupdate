<?php

namespace App\Http\Livewire;

use App\Models\Tool;
use App\Models\Link;
use App\Models\User;
use Livewire\Component;
use App\Models\UserTool;
use App\Models\FrameworkLibrary;
use App\Models\ProgrammingLanguage;
use App\Models\UserFrameworkLibrary;
use App\Models\UserProgrammingLanguage;

use function PHPUnit\Framework\isEmpty;

class TalentIndex extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $phone_number;
    public $country;
    public $city;
    public $linkedin;
    public $github;
    public $links;
    public $content;

    function rules()
    {
        return [
            'name' => ['required'],
            'phone_number' => 'nullable|numeric|unique:users,phone_number,' . auth()->user()->id,
            'country' => 'nullable',
            'city' => 'nullable',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url'
        ];
    }

    public function mount()
    {
        $this->fill([
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone_number' => auth()->user()->phone_number,
            'country' => auth()->user()->country,
            'city' => auth()->user()->city,
            'linkedin' => auth()->user()->linkedin,
            'github' => auth()->user()->github,
            'links' => auth()->user()->links,
        ]);
    }

    public function render()
    {
        return view('livewire.talent-index');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save($formData)
    {
        $validatedData = $this->validate();
        User::where('id', $this->user_id)->update($validatedData);

        $user = User::where('id', $this->user_id)->first();

        if (isEmpty($formData['programming_languages'])) {
            $user->programming_languages()->delete();
        }

        if (isEmpty($formData['framework_libraries'])) {
            $user->framework_libraries()->delete();
        }

        if (isEmpty($formData['tools'])) {
            $user->tools()->delete();
        }

        if ($formData['programming_languages'] ?? false) {
            $user->programming_languages()->delete();
            foreach (json_decode($formData['programming_languages']) as $programmingLanguage) {
                $existProgrammingLanguage = ProgrammingLanguage::where('name', 'like', '%' . $programmingLanguage->value . '%')->firstOrCreate([
                    'name' => $programmingLanguage->value
                ]);
                UserProgrammingLanguage::where('user_id', auth()->user()->id)->where('programming_language_id', $existProgrammingLanguage->id)->firstOrCreate([
                    'user_id' => auth()->user()->id,
                    'programming_language_id' => $existProgrammingLanguage->id
                ]);
            }
        }

        if ($formData['framework_libraries'] ?? false) {
            $user->framework_libraries()->delete();
            foreach (json_decode($formData['framework_libraries']) as $frameworkLibrary) {
                $existFrameworkLibrary = FrameworkLibrary::where('name', 'like', '%' . $frameworkLibrary->value . '%')->firstOrCreate([
                    'name' => $frameworkLibrary->value
                ]);
                UserFrameworkLibrary::where('user_id', auth()->user()->id)->where('framework_library_id', $existFrameworkLibrary->id)->firstOrCreate([
                    'user_id' => auth()->user()->id,
                    'framework_library_id' => $existFrameworkLibrary->id
                ]);
            }
        }

        if ($formData['tools'] ?? false) {
            $user->tools()->delete();
            foreach (json_decode($formData['tools']) as $tool) {
                $existTool = Tool::where('name', 'like', '%' . $tool->value . '%')->firstOrCreate([
                    'name' => $tool->value
                ]);
                UserTool::where('user_id', auth()->user()->id)->where('tool_id', $existTool->id)->firstOrCreate([
                    'user_id' => auth()->user()->id,
                    'tool_id' => $existTool->id
                ]);
            }
        }

        session()->flash('message', '🎉🎉🎉 Your information is updated! We will contact you when we found a suitable project for you.');
    }
}
