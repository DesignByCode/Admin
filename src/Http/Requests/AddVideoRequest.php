<?php

namespace DesignByCode\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'url' => [
                'required', 
                'regex:/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$|(?:https?:\/\/)?(?:www.|web.|m.)?facebook.com\/(?:video.php\?v=\d+|photo.php\?v=\d+|\?v=\d+)|\S+\/videos\/((\S+)\/(\d+)|(\d+))\/?/']
        ];
    }

    public function messages()
    {
        return [
            'url.regex' => 'This :attribute is not a valid youtube or facebook video'
        ];
    }

}
