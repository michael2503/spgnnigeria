<div class="card-box">
    <ul class="nav nav-pills navtab-bg nav-justified">
      <li class="nav-item">
        <a href="{{ route('userInfoTab', $userID) }}" class="nav-link @if($activePage == 'info') active @endif">
          Edit Profile
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('userBankTab', $userID) }}" class="nav-link @if($activePage == 'bank') active @endif">
            Bank Info
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('userReferralTab', $userID) }}" class="nav-link @if($activePage == 'referral') active @endif">
            Refferals
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('userIncomOrderTab', $userID) }}" class="nav-link @if($activePage == 'auctions') active @endif">
            Incoming Orders
        </a>
      </li>

      <!-- <li class="nav-item">
        <a href="#donation" data-toggle="tab" aria-expanded="true" class="nav-link">
            Donations
        </a>
      </li> -->
    </ul>
</div>
