<x-base-layout>
    {{ theme()->getView('pages/admin/edit/_navbar', array('class' => 'mb-5 mb-xl-10', 'user' => $user)) }}
    {{ theme()->getView('pages/admin/edit/_profile-details', array('class' => 'mb-5 mb-xl-10', 'user' => $user, 'roles' => $roles)) }}
    {{ theme()->getView('pages/admin/edit/_signin-method', array('class' => 'mb-5 mb-xl-10', 'user' => $user)) }}
</x-base-layout>
