// Type definitions for SendBird 3.0.x
// Project: https://sendbird.com/

interface SendBirdFactory {
  new(option: Object): SendBird_Instance;
}


/**
 * Interface for the SendBird Main
 */
interface SendBird_Instance {
  connect(userId: string, callback?: Function): void;
  connect(userId: string, accessToken: string, callback?: Function): void;
  disconnect(callback?: Function): void;

  getConnectionState(): string;
  getApplicationId(): string;

  updateCurrentUserInfo(nickname: string, profileImage: string, callback?: Function): void;

  // Push token
  registerGCMPushTokenForCurrentUser(gcmRegToken: string, callback?: Function): void;
  unregisterGCMPushTokenForCurrentUser(gcmRegToken: string, callback?: Function): void;
  unregisterGCMPushTokenAllForCurrentUser(callback?: Function): void;

  registerAPNSPushTokenForCurrentUser(apnsRegToken: string, callback?: Function): void;
  unregisterAPNSPushTokenForCurrentUser(apnsRegToken: string, callback?: Function): void;
  unregisterAPNSPushTokenAllForCurrentUser(callback: Function): void;

  setDoNotDisturb(doNotDisturbOn: boolean, startHour: number, startMin: number, endHour: number, endMin: number, timezone: string, callback?: Function): void;
  getDoNotDisturb(callback: Function): void;

  // Block / Unblock
  blockUser(userToBlock: User, callback?: Function): void;
  blockUserWithUserId(userToBlock: string, callback?: Function): void;

  unblockUser(blockedUser: User, callback?: Function): void;
  unblockUserWithUserId(blockedUserId: string, callback?: Function): void;

  // Channel Handler
  ChannelHandler: ChannelHandlerFactory;

  addChannelHandler(id: string, handler: ChannelHandler_Instance): void;
  removeChannelHandler(id: string): void;

  // Connection Handler
  ConnectionHandler(): void;

  addConnectionHandler(id: string, handler: ConnectionHandler): void;
  removeConnectionHandler(id: string): void;

  createUserListQuery(): UserListQuery;
  createBlockedUserListQuery(): UserListQuery;

  currentUser: User;
  GroupChannel: GroupChannel;
  OpenChannel: OpenChannel;
  UserMessage: UserMessage;
}

interface ConnectionHandler {
  onReconnectStarted(): void;
  onReconnectSucceeded(): void;
  onReconnectFailed(): void;
}


/**
 * User
 */
interface User {
  nickname: string;
  profileUrl: string;
  userId: string;
  connectionStatus: string;
  lastSeenAt: string;
}

interface UserListQuery {
  hasNext: boolean;
  limit: number;
  isLoading: boolean;

  next(callback: Function): void;
}


/**
 *  Message
 */
interface BaseMessage {
  isGroupChannel(): boolean;
  isOpenChannel(): boolean;

  isUserMessage(): boolean;
  isAdminMessage(): boolean;
  isFileMessage(): boolean;

  channelUrl: string;
  messageId: number;
  createdAt: number;
  channelType: string;
  messageType: string;
}

interface AdminMessage extends BaseMessage {
  message: string;
  data: string;
}

interface UserMessage extends BaseMessage {
  message: string;
  data: string;
  sender: User;
}

interface FileMessage extends BaseMessage {
  message: string;
  sender: User;

  url: string;
  name: string;
  size: number;
  type: string;
  data: string;
}

interface MessageListQuery {
  next(messageTimestamp: number, limit: number, reverse: boolean, callback: Function): void;
  prev(messageTimestamp: number, limit: number, reverse: boolean, callback: Function): void;
  load(messageTimestamp: number, prevLimit: number, nextLimit: number, reverse: boolean, callback: Function): void;
}

interface PreviousMessageListQuery {
  hasMore: boolean;
  load(limit: number, reverse: boolean, callback: Function): void;
}


/**
 *  Channel
 */
interface BaseChannel {
  isGroupChannel: boolean;
  isOpenChannel: boolean;

  url: string;
  name: string;
  coverUrl: string;
  createdAt: number;
  data: string;

  createPreviousMessageListQuery() : PreviousMessageListQuery;
  createMessageListQuery(): MessageListQuery;

  /* SendMessage */
  sendFileMessage(file: any, callback: Function): void;
  sendFileMessage(file: any, data: string, callback: Function): void;
  sendFileMessage(file: any, name: string, type: string, size: number, data: string, callback: Function): void;

  sendUserMessage(message: string, callback: Function): void;
  sendUserMessage(message: string, data: string, callback: Function): void;

  /* MetaCounter */
  createMetaCounters(metaCounterMap: Object, callback: Function): void;
  updateMetaCounters(metaCounterMap: Object, upsert: boolean, callback: Function): void;
  increaseMetaCounters(metaCounterMap: Object, callback: Function): void;
  decreaseMetaCounters(metaCounterMap: Object, callback: Function): void;
  getMetaCounters(keys: Object, callback: Function): void;
  getAllMetaCounters(callback: Function): void;
  deleteMetaCounter(key: string, callback: Function): void;
  deleteAllMetaCounters(callback: Function): void;

  /* MetaData */
  createMetaData(metaDataMap: Object, callback: Function): void;
  updateMetaData(metaDataMap: Object, upsert: boolean, callback: Function): void;
  getMetaData(keys: Object, callback: Function): void;
  getAllMetaData(callback: Function): void;
  deleteMetaData(key: string, callback: Function): void;
  deleteAllMetaData(callback: Function): void;

  deleteMessage(message: FileMessage|UserMessage, callback: Function): void;
}

interface ChannelHandlerFactory {
  new(): ChannelHandler_Instance;
}

interface ChannelHandler_Instance {
  onMessageReceived(channel: GroupChannel|OpenChannel, message: AdminMessage|UserMessage): void;
  onMessageDeleted(channel: GroupChannel, messageId: string): void;
  onReadReceiptUpdated(channel: GroupChannel): void;
  onTypingStatusUpdated(channel: GroupChannel): void;
  onTypingStatusUpdated(channel: GroupChannel): void;
  onUserJoined(channel: GroupChannel, user: User): void;
  onUserLeft(channel: GroupChannel, user: User): void;
  onUserEntered(channel: OpenChannel, user: User): void;
  onUserExited(channel: OpenChannel, user: User): void;
  onUserMuted(channel: OpenChannel, user: User): void;
  onUserUnmuted(channel: OpenChannel, user: User): void;
  onUserBanned(channel: OpenChannel, user: User): void;
  onUserUnbanned(channel: OpenChannel, user: User): void;
  onChannelFrozen(channel: OpenChannel): void;
  onChannelUnfrozen(channel: OpenChannel): void;
  onChannelChanged(channel: OpenChannel|GroupChannel): void;
  onChannelDeleted(channelUrl: string): void;
}


/**
 *  Open Channel
 */
interface OpenChannel extends BaseChannel {

  createChannel(callback: Function): void;
  createChannel(name: string, coverUrl: string, data: any, callback: Function): void;
  createChannel(name: string, coverUrl: string, data: any, operatorUserIds: any, callback: Function): void;

  enter(callback: Function): void;
  exit(callback: Function): void;

  getChannel(channelUrl: string, callback: Function): void;

  refresh(): void;

  createParticipantListQuery(): UserListQuery;
  createMutedUserListQuery(): UserListQuery;
  createBannedUserListQuery(): UserListQuery;

  banUser(user: User, seconds: number, callback: Function): void;
  banUserWithUserId(userId: string, seconds: number, callback: Function): void;

  unbanUser(user: User, callback: Function): void;
  unbanUserWithUserId(userId: string, callback: Function): void;

  muteUser(user: User, callback: Function): void;
  muteUserWithUserId(userId: string, callback: Function): void;

  unmuteUser(user: User, callback: Function): void;
  unmuteUserWithUserId(userId: string, callback: Function): void;

  isOperator(user: User): boolean;
  isOperatorWithUserId(userId: string): boolean;

  createOpenChannelListQuery(): OpenChannelListQuery;
}

interface OpenChannelListQuery {
  limit: number;
  hasNext: boolean;
  next(callback: Function): void;
}

interface OpenChannelParticipantListQuery {
  limit: number;
  hasNext: boolean;
  mutedOnly: boolean;
  next(callback: Function): void;
}


/**
 *  Group Channel
 */
interface GroupChannelListQuery {
  limit: number;
  includeEmpty: boolean;
  order: string;
  hasNext: boolean;
  next(callback: Function): void;
}

interface GroupChannel extends BaseChannel {
  createChannel(users: [User], isDistinct: boolean, callback: Function): void;
  createChannel(users: [User], isDistinct: boolean, name: string, coverUrl: string, data: any, callback: Function): void;

  markAsRead(): void;
  markAsReadAll(callback: Function): void;

  refresh(callback: Function): void;

  invite(users: [User], callback: Function): void;
  inviteWithUserIds(userIds: [string], callback: Function): void;

  hide(callback: Function): void;
  leave(callback: Function): void;
  markAsRead(): void;

  getReadReceipt(message: UserMessage): number;
  updateReadReceipt(userId: string, timestamp: number): void;

  startTyping(): void;
  endTyping(): void;
  isTyping(): boolean;
  getTypingMembers(): [number, User];
  getTotalUnreadMessageCount(callback: Function): void;

  isDistinct: boolean;
  unreadMessageCount: number;
  members: [number, User];
  lastMessage: BaseMessage;
  memberCount: number;

  createMyGroupChannelListQuery(): GroupChannelListQuery;

  setPushPreference(pushOn: boolean, callback: Function): void;
  getPushPreference(callback: Function): void;

  getReadStatus(): Object;
}

declare var SendBird: SendBirdFactory;
