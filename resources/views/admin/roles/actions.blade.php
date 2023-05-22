<div class="flex px-3">
  @can('admin.roles.edit')
    <a class="rounded-sm text-sm py-0.5 px-1" href="{{ route('admin.roles.edit', $row) }}" title="Editar">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 43 43" fill="none">
        <rect x="0.104492" y="0.141602" width="42" height="42" rx="21" fill="#DDB542"/>
        <path d="M30.5545 31.1693H21.1045C20.4745 31.1693 20.0545 30.7493 20.0545 30.1193C20.0545 29.4893 20.4745 29.0693 21.1045 29.0693H30.5545C31.1845 29.0693 31.6045 29.4893 31.6045 30.1193C31.6045 30.7493 31.1845 31.1693 30.5545 31.1693ZM13.4395 31.1693H11.6545C11.0245 31.1693 10.6045 30.7493 10.6045 30.1193V28.3343C10.6045 27.8093 10.6045 27.3893 10.7095 27.0743C10.8145 26.7593 10.9195 26.4443 11.1295 26.1293C11.3395 25.8143 11.5495 25.6043 11.9695 25.1843L25.0945 12.0593C26.3545 10.7993 28.4545 10.7993 29.7145 12.0593C30.9745 13.3193 30.9745 15.4193 29.7145 16.6793L16.4845 29.9093C16.0645 30.3293 15.8545 30.5393 15.5395 30.7493C15.2245 30.9593 14.9095 31.0643 14.5945 31.1693C14.2795 31.1693 13.9645 31.1693 13.4395 31.1693ZM12.7045 29.0693H13.4395C13.8595 29.0693 14.0695 29.0693 14.1745 29.0693C14.2795 29.0693 14.3845 28.9643 14.4895 28.9643C14.5945 28.8593 14.8045 28.7543 15.0145 28.4393L28.2445 15.2093C28.6645 14.7893 28.6645 14.0543 28.2445 13.5293C27.8245 13.1093 26.9845 13.1093 26.5645 13.5293L13.3345 26.7593C13.0195 27.0743 12.9145 27.1793 12.8095 27.2843C12.7045 27.3893 12.7045 27.4943 12.7045 27.5993C12.7045 27.7043 12.7045 27.9143 12.7045 28.3343V29.0693Z" fill="white"/>
      </svg>
    </a>
  @endcan
  @can('admin.roles.destroy')
    <a class="rounded-sm text-sm py-0.5 px-1" href="{{ route('admin.roles.destroy', $row) }}" title="Eliminar">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 43 43" fill="none">
        <rect x="0.129395" y="0.96875" width="42" height="42" rx="21" fill="#C83232"/>
        <path d="M22.7044 32.4688H19.5544C17.7694 32.4688 16.8244 32.4688 15.9844 32.0487C15.2494 31.6287 14.6194 31.1037 14.1994 30.3687C13.6744 29.5287 13.6744 28.5837 13.5694 26.7987L12.8344 16.7188H11.6794C11.0494 16.7188 10.6294 16.2987 10.6294 15.6687C10.6294 15.0387 11.0494 14.6187 11.6794 14.6187H13.7794H28.4794H30.5794C31.2094 14.6187 31.6294 15.0387 31.6294 15.6687C31.6294 16.2987 31.2094 16.7188 30.5794 16.7188H29.4244L28.7944 26.7987C28.6894 28.5837 28.5844 29.5287 28.1644 30.3687C27.7444 31.1037 27.1144 31.7337 26.3794 32.0487C25.4344 32.4688 24.4894 32.4688 22.7044 32.4688ZM14.9344 16.7188L15.5644 26.6937C15.6694 28.1637 15.6694 28.8987 15.9844 29.3187C16.1944 29.7387 16.5094 29.9487 16.9294 30.1587C17.2444 30.3687 18.0844 30.3687 19.5544 30.3687H22.7044C24.1744 30.3687 24.9094 30.3687 25.4344 30.1587C25.8544 29.9487 26.1694 29.6337 26.3794 29.3187C26.5894 28.8987 26.6944 28.0587 26.7994 26.6937L27.3244 16.7188H14.9344ZM23.2294 26.6937C22.5994 26.6937 22.1794 26.2737 22.1794 25.6437V20.3937C22.1794 19.7637 22.5994 19.3437 23.2294 19.3437C23.8594 19.3437 24.2794 19.7637 24.2794 20.3937V25.6437C24.2794 26.2737 23.8594 26.6937 23.2294 26.6937ZM19.0294 26.6937C18.3994 26.6937 17.9794 26.2737 17.9794 25.6437V20.3937C17.9794 19.7637 18.3994 19.3437 19.0294 19.3437C19.6594 19.3437 20.0794 19.7637 20.0794 20.3937V25.6437C20.0794 26.2737 19.6594 26.6937 19.0294 26.6937ZM24.2794 13.5687H17.9794C17.3494 13.5687 16.9294 13.1487 16.9294 12.5187C16.9294 11.8887 17.3494 11.4688 17.9794 11.4688H24.2794C24.9094 11.4688 25.3294 11.8887 25.3294 12.5187C25.3294 13.1487 24.9094 13.5687 24.2794 13.5687Z" fill="white"/>
      </svg>
    </a>
  @endcan
</div>