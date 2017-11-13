<?php
/**
 * Created by PhpStorm.
 * User: ricardo.diego
 * Date: 07/11/2017
 * Time: 13:49
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Chat Box
                        <span class="badge pull-right">@{{ usersInRoom.length }}</span>
                    </div>

                    <div class="panel-body">

                        <div id="app">
                            <chat-log :messages="messages"></chat-log>
                            <chat-composer v-on:messagesent="addMessage"></chat-composer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
