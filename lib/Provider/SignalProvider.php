<?php

declare(strict_types=1);

/**
 * @author Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * Nextcloud - Two-factor Gateway
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\TwoFactorGateway\Provider;

use OCA\TwoFactorGateway\Service\Gateway\Signal\Gateway;
use OCA\TwoFactorGateway\Service\StateStorage;
use OCP\IL10N;
use OCP\ISession;
use OCP\Security\ISecureRandom;

class SignalProvider extends AProvider {

	public function __construct(Gateway $smsGateway,
								StateStorage $stateStorage,
								ISession $session,
								ISecureRandom $secureRandom,
								IL10N $l10n) {
		parent::__construct(
			'signal',
			$smsGateway,
			$stateStorage,
			$session,
			$secureRandom,
			$l10n
		);
	}

	/**
	 * Get the display name for selecting the 2FA provider
	 */
	public function getDisplayName(): string {
		return $this->l10n->t('Signal verification');
	}

	/**
	 * Get the description for selecting the 2FA provider
	 */
	public function getDescription(): string {
		return $this->l10n->t('Authenticate via Signal');
	}

}