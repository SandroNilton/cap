<div class="flex">
  @can('admin.areas.edit')
    <a class="rounded-sm text-sm py-0.5 px-1" href="{{ route('admin.procedures.edit', ['procedure' => $row->id ]) }}" title="Editar">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 43 43" fill="none">
        <rect x="0.104492" y="0.141602" width="42" height="42" rx="21" fill="#DDB542"/>
        <path d="M30.5545 31.1693H21.1045C20.4745 31.1693 20.0545 30.7493 20.0545 30.1193C20.0545 29.4893 20.4745 29.0693 21.1045 29.0693H30.5545C31.1845 29.0693 31.6045 29.4893 31.6045 30.1193C31.6045 30.7493 31.1845 31.1693 30.5545 31.1693ZM13.4395 31.1693H11.6545C11.0245 31.1693 10.6045 30.7493 10.6045 30.1193V28.3343C10.6045 27.8093 10.6045 27.3893 10.7095 27.0743C10.8145 26.7593 10.9195 26.4443 11.1295 26.1293C11.3395 25.8143 11.5495 25.6043 11.9695 25.1843L25.0945 12.0593C26.3545 10.7993 28.4545 10.7993 29.7145 12.0593C30.9745 13.3193 30.9745 15.4193 29.7145 16.6793L16.4845 29.9093C16.0645 30.3293 15.8545 30.5393 15.5395 30.7493C15.2245 30.9593 14.9095 31.0643 14.5945 31.1693C14.2795 31.1693 13.9645 31.1693 13.4395 31.1693ZM12.7045 29.0693H13.4395C13.8595 29.0693 14.0695 29.0693 14.1745 29.0693C14.2795 29.0693 14.3845 28.9643 14.4895 28.9643C14.5945 28.8593 14.8045 28.7543 15.0145 28.4393L28.2445 15.2093C28.6645 14.7893 28.6645 14.0543 28.2445 13.5293C27.8245 13.1093 26.9845 13.1093 26.5645 13.5293L13.3345 26.7593C13.0195 27.0743 12.9145 27.1793 12.8095 27.2843C12.7045 27.3893 12.7045 27.4943 12.7045 27.5993C12.7045 27.7043 12.7045 27.9143 12.7045 28.3343V29.0693Z" fill="white"/>
      </svg>
    </a>
  @endcan
</div>