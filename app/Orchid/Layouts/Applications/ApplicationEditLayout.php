<?php

namespace App\Orchid\Layouts\Applications;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;
use Orchid\Screen\Fields\Label;

class ApplicationEditLayout extends Rows
{
    public function __construct(protected Application $application)
    {
    }

    protected function fields(): iterable
    {

        return [
            Label::make('application.name')
                ->title('Name'),
            Label::make('application.email')
                ->title('Email'),
            Label::make('application.message')
                ->title('Message'),
            TextArea::make('application.comment')
                ->title('Comment')
                ->rows(3)
                ->maxlength(200)
                ->placeholder('respond to the message')
                ->required(),
            Button::make(__('Reply'))
                ->icon('speech')
                ->type(Color::DEFAULT())
                ->method('reply'),
        ];
    }
}


