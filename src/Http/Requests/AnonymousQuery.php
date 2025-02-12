<?php
/*
 * Copyright 2021 Cloud Creativity Limited
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace LaravelJsonApi\Laravel\Http\Requests;

use LaravelJsonApi\Core\Query\Custom\ExtendedQueryParameters;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class AnonymousQuery extends ResourceQuery
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fields' => [
                'nullable',
                'array',
                JsonApiRule::fieldSets(),
            ],
            'filter' => [
                'nullable',
                'array',
                JsonApiRule::filter(),
            ],
            'include' => [
                'nullable',
                'string',
                JsonApiRule::includePaths(),
            ],
            'page' => JsonApiRule::notSupported(),
            'sort' => JsonApiRule::notSupported(),
            ExtendedQueryParameters::withCount() => [
                'nullable',
                'string',
                JsonApiRule::countable(),
            ],
        ];
    }
}
