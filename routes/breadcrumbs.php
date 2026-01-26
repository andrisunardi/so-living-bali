<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// ERRORS 404
Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.error'), null, ['icon' => 'fas fa-circle-exclamation']);
});

// LIVEWIRE MESSAGE
Breadcrumbs::for('livewire.message', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.message'), null, ['icon' => 'fas fa-message']);
});

// LIVEWWIRE UPDATE
Breadcrumbs::for('livewire.update', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.update'), null, ['icon' => 'fas fa-edit']);
});

// LIVEWIRE PREVIEW FILE
Breadcrumbs::for('livewire.preview-file', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.preview_file'), null, ['icon' => 'fas fa-photo-film']);
});

// TELESCOPE
Breadcrumbs::for('telescope', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.telescope'), null, ['icon' => 'fas fa-telescope']);
});

// HORIZON
Breadcrumbs::for('horizon.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.horizon'), null, ['icon' => 'fas fa-cloud-moon']);
});

// LOG VIEWER
Breadcrumbs::for('log-detailer.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.log_detailer'), null, ['icon' => 'fas fa-history']);
});

// HOME
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(trans('page.home'), route('home'), ['icon' => 'fas fa-home']);
});

// CMS
// HOME
Breadcrumbs::for('cms.home', function (BreadcrumbTrail $trail) {
    $trail->push(trans('page.home'), route('cms.home'), ['icon' => 'fas fa-home']);
});

// CONTACT
Breadcrumbs::for('cms.contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('page.contact'), route('cms.contact.index'), ['icon' => 'fas fa-phone']);
});

Breadcrumbs::for('cms.contact.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.contact.index');
    $trail->push(trans('index.add'), route('cms.contact.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.contact.edit', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('cms.contact.index');
    $trail->push(trans('index.edit'), route('cms.contact.edit', $contact), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.contact.detail', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('cms.contact.index');
    $trail->push(trans('index.detail'), route('cms.contact.detail', $contact), ['icon' => 'fas fa-list']);
});

// PROPERTY
Breadcrumbs::for('cms.property.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('page.property'), route('cms.property.index'), ['icon' => 'fas fa-building']);
});

Breadcrumbs::for('cms.property.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.property.index');
    $trail->push(trans('index.add'), route('cms.property.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.property.edit', function (BreadcrumbTrail $trail, $property) {
    $trail->parent('cms.property.index');
    $trail->push(trans('index.edit'), route('cms.property.edit', $property), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.property.detail', function (BreadcrumbTrail $trail, $property) {
    $trail->parent('cms.property.index');
    $trail->push(trans('index.detail'), route('cms.property.detail', $property), ['icon' => 'fas fa-list']);
});

// ARTICLE
Breadcrumbs::for('cms.article.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('page.article'), route('cms.article.index'), ['icon' => 'fas fa-newspaper']);
});

Breadcrumbs::for('cms.article.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.article.index');
    $trail->push(trans('index.add'), route('cms.article.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.article.edit', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('cms.article.index');
    $trail->push(trans('index.edit'), route('cms.article.edit', $article), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.article.detail', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('cms.article.index');
    $trail->push(trans('index.detail'), route('cms.article.detail', $article), ['icon' => 'fas fa-list']);
});

// ROLE
Breadcrumbs::for('cms.role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('page.role'), route('cms.role.index'), ['icon' => 'fas fa-key']);
});

Breadcrumbs::for('cms.role.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.role.index');
    $trail->push(trans('index.add'), route('cms.role.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.role.edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('cms.role.index');
    $trail->push(trans('index.edit'), route('cms.role.edit', $role), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.role.detail', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('cms.role.index');
    $trail->push(trans('index.detail'), route('cms.role.detail', $role), ['icon' => 'fas fa-list']);
});

// USER
Breadcrumbs::for('cms.user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('page.user'), route('cms.user.index'), ['icon' => 'fas fa-user']);
});

Breadcrumbs::for('cms.user.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.user.index');
    $trail->push(trans('index.add'), route('cms.user.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.user.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('cms.user.index');
    $trail->push(trans('index.edit'), route('cms.user.edit', $user), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.user.detail', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('cms.user.index');
    $trail->push(trans('index.detail'), route('cms.user.detail', $user), ['icon' => 'fas fa-list']);
});
