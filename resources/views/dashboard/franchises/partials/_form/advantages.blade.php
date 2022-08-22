{{-- Преимущества --}}
{{-- <div class="form-row mt-5">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">@lang('Advantages')</h5>
        <div class="form-group row">
            @foreach ($advantages->chunk(round($advantages->count() / 3)) as $chunk_advantages)
                <div class="col-md-4">
                    @foreach ($chunk_advantages as $advantage)
                    @php
                        $relationAdvantage = isset($franchise) ? $franchise->advantages->firstWhere('id', $advantage->id) : null;
                    @endphp

                    <div class="form-row my-5">
                        <div class="col-md-12 mb-2">
                            <span class="font-weight-bold">{{ $advantage->name }}</span>
                        </div>
                        <div class="col-md-4">
                            <select name="advantages[{{ $advantage->id }}][type]" id="advatage_type_{{ $advantage->id }}" data-select data-placeholder="@lang('Type')">
                                @foreach ([1 => 'Good', 2 => 'Bad'] as $type => $name)
                                    <option value="{{ $type }}" @if (!empty($relationAdvantage)) @selected((int) $relationAdvantage->pivot->type === $type) @endif>
                                        @lang($name)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="advantages[{{ $advantage->id }}][label]" value="{{ !empty($relationAdvantage) ? $relationAdvantage->pivot->label : null }}" class="form-control">
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="advantages[{{ $advantage->id }}][is_main]" class="custom-control-input" id="advantage_is_main_{{ $advantage->id }}" @if (!empty($relationAdvantage)) @checked($relationAdvantage->pivot->is_main) @endif>
                                <label class="custom-control-label" for="advantage_is_main_{{ $advantage->id }}">Основное преимущество</label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div> --}}
<div class="form-row">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">@lang('Advantages')</h5>
        <v-franchise-advantages data="{{ isset($franchise) ? $franchise->advantages->toJson() : json_encode([]) }}"></v-franchise-advantages>
    </div>
</div>