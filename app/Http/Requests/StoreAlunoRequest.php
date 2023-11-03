<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'min:10','max:255'],
            'email' => ['bail','required', 'string', 'email', 'max:255', 'unique:users', 'regex:/\S+@\S+\.\S+/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['required','unique:alunos', 'cpf', 'bail'],
            'vinculo' => ['required'],
            'unidade' => ['required'],
            'cursos' => ['required'],
        ];

        return $rules;
    }

    protected function prepareForValidation(){
        $this->merge([
            'cpf' => preg_replace('/[^0-9]/', '', $this->cpf),
        ]);
    }

    public function messages(){
        return [
            'cpf' => [
                'unique' => 'O :attribute informado já está cadastrado para um aluno.',
            ],
            'name.required' => 'Por favor, preencha este campo',
            'email.required' => 'Por favor, preencha este campo',
            'email.email' => 'Por favor, preencha um email válido',
            'vinculo.required' => 'Por favor, selecione o tipo de vínculo',
            'unidade.required' => 'Por favor, selecione a unidade acadêmica',
            'cursos.required' => 'Por favor, selecione o seu curso',
            'password.required' => 'Por favor, digite uma senha',
            'password.min' => 'Por favor, digite uma senha com, no mínimo, 8 dígitos',
        ];
    }
    
}
